export function setObjectValue(key, object, value) {
    if (typeof key == "string") object[key] = value;

    if (Array.isArray(key) && key.length == 1)
        object[key[0]] = value;

    if (Array.isArray(key) && key.length > 1)
        object[key] = setObjectValue(key[0], object[key], value)

    return object
}
