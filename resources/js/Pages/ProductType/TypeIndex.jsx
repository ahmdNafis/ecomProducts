import { useGetProductTypesQuery, useLazyGetProductTypeQuery } from "../features/api/apiSlice";
import { Link } from "@inertiajs/react";
import { useState } from "react";

export default function TypeIndex() {
    const columns = ['id', 'type name', 'type active', 'type weight', 'products']
    const {
        data: types,
        isLoading,
        isSuccess,
        isError,
    } = useGetProductTypesQuery()

    const [productType, setProductType] = useState(false)
    const [trigger, result, lastPromiseInfo] = useLazyGetProductTypeQuery()
    let content

    if(result.status != 'uninitialized') {
        const {
            data: type,
            isError,
            isLoading,
            isFetching,
            isSuccess,
            error
        } = result
        if(isError) return <div>
            {error.data}
        </div>
        if(isLoading) return <div>...Loading</div>
        if(isFetching) return <div>...Fetching</div>
        if(isSuccess) {
            content = (
                <div>
                    <pre>{type.id}</pre>
                    <h3>{type.type_name}</h3>
                    <p>{type.type_description}</p>
                </div>
            )
        }
    }

    if(isLoading) return <p>...Loading</p>
    else if(isError) return <p>...Error</p>
    else if(isSuccess) return <>
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
                            types.map((type, id) => {
                                return (
                                    <tr key={id}>
                                        <td>{type.id}</td>
                                        <td>{type.type_name}</td>
                                        <td>{type.type_active ? 'Active' : 'Inactive'}</td>
                                        <td>{type.type_weight}</td>
                                        <td>{type.products.length}</td>
                                        <td>
                                            <button onClick={() => {
                                                setProductType(true)
                                                trigger(type.id)}}>Show</button>
                                        </td>
                                    </tr>
                                )
                            })
                        }
                    </tbody>
                </table>

                {productType && content}
            </section>
    </>
}