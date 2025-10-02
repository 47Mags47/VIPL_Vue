export function getObjectValue(key, object) {
    key = Array.isArray(key) ? key : [key]
        return key.reduce((acc, key) => (acc ? acc[key] : null), object)
}
