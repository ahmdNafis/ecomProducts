import { useQuery, gql } from '@apollo/client';
import { ApolloClient, InMemoryCache } from '@apollo/client';

const GET_PRODUCT_TYPES = gql`
    query GetProductTypes {
        productTypes {
            id
            type_name
            type_weight
            type_description
        }
    }
`
const newClient = new ApolloClient({
    uri: 'http://localhost/fetchTypes',
    cache: new InMemoryCache(),
})

const TypeList = () => {
    const { data, loading, error } = useQuery(GET_PRODUCT_TYPES, {
        client: newClient,
    })

    if(loading) return <p>...Loading</p>
    if(error) return <p>...error</p>

    console.log(data.productTypes)
}

export default function TypeIndex() {
    return <>
        <section>
            <h2>Fetching Product Types</h2>
            <TypeList />
        </section>
    </>
}