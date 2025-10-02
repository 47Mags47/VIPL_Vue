export function objectToDoted (object, totalKey) {
    let res = {};
    let keys = Object.keys(object);

    if (totalKey === undefined) totalKey = [];

    keys.forEach(
        function (key) {
            let localKey = [...totalKey];
            localKey.push(key);

            if (object[key] !== null && typeof object[key] === "object") {
                res = {
                    ...res,
                    ...objectToDoted(object[key], localKey),
                };
            } else {
                res[localKey.join(".")] = object[key];
            }
        }.bind(this)
    );

    return res;
};
