import { useGetProductTypesQuery } from "../features/api/apiSlice";
import { Link } from "@inertiajs/react";

export default function TypeIndex() {
    const {
        data: types,
        isLoading,
        isSuccess,
        isError,
    } = useGetProductTypesQuery()

    const columns = ['id', 'type name', 'type active', 'type weight', 'products']
    if(isLoading) return <p>...Loading</p>
    else if(isError) return <p>...Error</p>
    else if(isSuccess) return <>
            <section>
                <div>
                    <Link type="button" href="/newProductType">New</Link>
                </div>
                <table>
                    <thead>
                        <tr>
                            {
                                columns.map(col => {
                                    return <th>{col}</th>
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
                                    </tr>
                                )
                            })
                        }
                    </tbody>
                </table>
            </section>
    </>
}