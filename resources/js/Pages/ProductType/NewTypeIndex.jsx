import { Link } from "@inertiajs/react"
import { gql, useMutation } from '@apollo/client';
import { useState } from "react"

const NEW_TYPE = gql`
    mutation NewProductType($input: NewProductType!) {
        createProductType(input: $input) {
            id
            type_name
            type_active
        }
    }
`

export default function NewTypeIndex() {
    const [createProductType, {data, loading, error}] = useMutation(NEW_TYPE)
    const [typeName, setTypeName] = useState('')
    const [typeWeight, setTypeWeight] = useState('')
    const [typeDesc, setTypeDesc] = useState('')

    
    const submitForm = (e) => {
        e.preventDefault()
        const newType = {
            type_name: typeName,
            type_weight: parseInt(typeWeight),
            type_description: typeDesc,
            type_active: true,
        }
        
        createProductType({
            variables: {
                input: newType,
            }
        })
    }
    if(loading) return <p>...loading...</p>
    else if(error) return <p>...error: ${error.message}...</p>
    else return <>
        <section>
            <Link href="/indexType" type="button">Back</Link>
            <form onSubmit={submitForm}>
                <div>
                    <label htmlFor="type_name">Type Name</label>
                    <input type="text" onChange={
                        (e) => setTypeName(e.target.value)
                    } name="type_name" value={typeName} />
                </div>
                <div>
                    <label htmlFor="type_weight">Type Weight</label>
                    <input type="number" onChange={
                        (e) => setTypeWeight(e.target.value)
                    } name="type_weight" value={typeWeight} />
                </div>
                <div>
                    <label htmlFor="type_description">Description</label>
                    <textarea 
                        name="type_description"
                        value={typeDesc}
                        rows="4"
                        cols="7"
                        onChange={(e) => setTypeDesc(e.target.value)}
                    >
                    </textarea>
                </div>
                <div>
                    <button 
                        onClick={submitForm}
                        type="submit"
                        disabled={loading}
                        >Create</button>
                </div>
            </form>
        </section>
    </>
}