import { createApi } from "@reduxjs/toolkit/query/react"; 
//import { request, gql, ClientError } from 'graphql-request';
import {client} from '../../../client';

// const graphqlBaseQuery =
//   ({ baseUrl }) =>
//   async ({ body }) => {
//     try {
//       const result = await request(baseUrl, body)
//       return { data: result }
//     } catch (error) {
//       if (error instanceof ClientError) {
//         return { error: { status: error.response.status, data: error } }
//       }
//       return { error: { status: 500, data: error } }
//     }
//   }

const client = new ApolloClient({
    uri: 'http://localhost/graphql',
    cache: new InMemoryCache(),
})
Na\1nadie3?
export const apiSlice = createApi({
    // baseQuery: graphqlBaseQuery({ 
    //     baseUrl: "http://localhost/graphql",
    //     prepareHeaders: (headers, { getState }) => {
    //         const csrfToken = getState().api.queries.csrfToken;
    //         headers.set('x-csrf-token', csrfToken);
    //         return headers;
    //     },
    // }),
    baseQuery: (arg) => client.query(arg),
    tagTypes: ["ProductTypes"],
    endpoints: (builder) => ({
        getProductTypes: builder.query({
            query: () => ({
                query: `
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
                query: `
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
            }),
            transformResponse: (res) => res.productType,
            providesTags: ["ProductTypes"],
        }),
        addProductType: builder.mutation({
            query: (initialType) => ({            
                query: `
                    mutation newProductType($input: NewProductType!) {
                        createProductType(input: $input) {
                            id
                            type_name
                        }
                    }
                `,
                variables: {
                    input: initialType
                },
            }),
            transformResponse: res => res.data,
            invalidatesTags: ['ProductTypes'],
        })
    })
})

export const {
    useGetProductTypesQuery,
    useLazyGetProductTypeQuery,
    useAddProductTypeMutation,
} = apiSlice