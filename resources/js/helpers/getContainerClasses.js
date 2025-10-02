export function getContainerClasses(classes, baseClass) {
    let result = {};

    if (baseClass !== undefined) result[baseClass] = true;

    if (classes !== null) {
        if (Array.isArray(classes))
            classes.map((name) => (result[name + "-container"] = true));
        else if (typeof classes == "object")
            Object.keys(classes).map(
                (key) => (result[key + "-container"] = true)
            );
        else if (typeof classes == "string")
            result[classes + "-container"] = true;
    }

    return result;
}
