import { useQuery, gql } from "@apollo/client";
import { Link } from "@inertiajs/react";
import { useState } from "react";

import ShowTypeIndex from "./ShowTypeIndex";

const GET_ALL_TYPES = gql`
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

export default function TypeIndex() {
    const columns = ['id', 'type name', 'type active', 'type weight', 'products']
    const {
        data,
        loading,
        error,
    } = useQuery(GET_ALL_TYPES)
    

    const [productType, setProductType] = useState(false)
    
    if(loading) return <p>...Loading</p>
    else if(error) return <p>...Error: {$error.message}</p>
    else return <>
    <section>
        <div>
            <Link className="btn btn-primary" type="button" href="/newProductType">New</Link>
        </div>
        <table>
            <thead>
                <tr>
                    {
                        columns.map((col,i) => {
                            return <th key={i}>{col}</th>
                        })
                    }
                </tr>
            </thead>
            <tbody>
                {
                    data.productTypes.map((type, id) => {
                        return (
                            <tr key={id}>
                                <td>{type.id}</td>
                                <td>{type.type_name}</td>
                                <td>{type.type_active ? 'Active' : 'Inactive'}</td>
                                <td>{type.type_weight}</td>
                                <td>{type.products.length}</td>
                                <td>
                                    <button onClick={() => setProductType(type.id)}>Show</button>
                                    <button onClick={() => }>Remove</button>
                                </td>
                            </tr>
                        )
                    })
                }
            </tbody>
        </table>

        {productType && 
            <div>
                <ShowTypeIndex typeId={productType} />
            </div>
        }
    </section>
</>
}