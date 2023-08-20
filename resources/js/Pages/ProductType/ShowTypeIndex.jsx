import { useQuery, gql } from "@apollo/client";

const GET_TYPE = gql`
    query GetProductType($id: Int!) {
        productType(id: $id) {
            id
            type_name
            type_description
        }
    }
`

export default function ShowTypeIndex({ typeId }) {
    const {
        data,
        loading,
        error,
    } = useQuery(GET_TYPE, {
        variables: {id: parseInt(typeId)}
    })
    let type = data.productType
    if(loading) return <div>...loading</div>
    else if(error) 
        return <div>...There is a error:${error.message}</div>
    else
        return <>
        <section>
            <div>
                <h2>{type.type_name}</h2>
                <p>{type.type_description}</p>
            </div>
        </section>
    </>
}