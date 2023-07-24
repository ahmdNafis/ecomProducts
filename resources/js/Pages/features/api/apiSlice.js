import { fetchBaseQuery, createApi } from "@reduxjs/toolkit/dist/query";

export const apiSlice = createApi({
    reducerPath: "api",
    baseQuery: fetchBaseQuery({ 
        baseUrl: "http://localhost:5173/",
        prepareHeaders: (headers, { getState }) => {
            const csrfToken = getState().api.queries.csrfToken;
            headers.set('x-csrf-token', csrfToken);
            return headers;
        },
    }),
    tagTypes: ["ProductTypes", "Products",],
    endpoints: (builder) => ({
        getProductTypes: builder.query({
            query: () => `/fetchTypes`,
            providesTags: ["ProductTypes"],
        }),
    })
})