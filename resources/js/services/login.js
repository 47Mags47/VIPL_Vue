import { router } from "@inertiajs/vue3";

export function login({ ...data }) {
    router.post(route("session.store"), data);
}

export function logout() {
    router.delete(route("session.destroy"));
}
