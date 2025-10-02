export function clearObject(object) {
    Object.keys(object).forEach((key) => {
        if(typeof object[key] === 'object')
            object[key] = clearObject(object[key])

        if(object[key] === '' || object[key] === null || object[key] === undefined)
            delete object[key]
    })

    return object
}
