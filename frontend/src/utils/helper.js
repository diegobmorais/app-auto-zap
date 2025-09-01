
export const getCsrf = async () => {
    await api.get('/sanctum/csrf-cookie')
}
