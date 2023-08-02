import { createApi } from "@reduxjs/toolkit/query/react"; 
import { request, gql, ClientError } from 'graphql-request';

const graphqlBaseQuery =
  ({ baseUrl }) =>
  async ({ body }) => {
    try {
      const result = await request(baseUrl, body)
      return { data: result }
    } catch (error) {
      if (error instanceof ClientError) {
        return { error: { status: error.response.status, data: error } }
      }
      return { error: { status: 500, data: error } }
    }
  }

export const apiSlice = createApi({
    baseQuery: graphqlBaseQuery({ 
        baseUrl: "http://localhost/graphql",
        prepareHeaders: (headers, { getState }) => {
            const csrfToken = getState().api.queries.csrfToken;
            headers.set('x-csrf-token', csrfToken);
            return headers;
        },
    }),
    tagTypes: ["ProductTypes"],
    endpoints: (builder) => ({
        getProductTypes: builder.query({
            query: () => ({
                body: gql`
                    query GetProductTypes {
                        productTypes {
                            id
                            type_name
                            type_weight
                            type_active
                            products {
                                id
                                product_title
                            }
                        }
                    }
                `
            }),
            transformResponse: (res) => res.productTypes,
            providesTags: ["ProductTypes"],
        }),
        getProductType: builder.query({
            query: (id) => ({
                body: gql`
                    query GetProductType {
                        productType(id: ${id}) {
                            id
                            type_name
                            type_description

                            products {
                                id
                                product_title
                                product_available
                            }
                        }
                    }
                `
            })
        })
    })
})

export const {
    useGetProductTypesQuery,
    useGetProductTypeQuery,
} = apiSlice