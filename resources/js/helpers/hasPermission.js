import { usePage } from "@inertiajs/vue3";

export function hasPermission(permission){
    let permissions = usePage().props.current_user.data.permissions

    return permissions.includes(permission)
}
