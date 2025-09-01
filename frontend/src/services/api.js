import axios from 'axios';

const api = axios.create({
    baseURL: import.meta.env.VITE_API_BASE_URL || 'http://localhost',
    withCredentials: true,
    withXSRFToken: true,
    xsrfCookieName: 'XSRF-TOKEN',
    xsrfHeaderName: 'X-XSRF-TOKEN',
});

// Função para obter o cookie CSRF antes de logar ou fazer requests protegidas
async function getCsrfCookie() {
    await api.get('/sanctum/csrf-cookie');
}

// Intercepta erros e tenta renovar o CSRF se necessário
let isRefreshing = false;
api.interceptors.response.use(
    (response) => response,
    async (error) => {
        const { response, config } = error;
        if (!response || !config) throw error;

        // Se o token CSRF expirou (419) ou a sessão foi perdida (401)
        if ((response.status === 419 || response.status === 401) && !config._retry) {
            config._retry = true;
            if (!isRefreshing) {
                isRefreshing = true;
                try {
                    await getCsrfCookie();
                } finally {
                    isRefreshing = false;
                }
            } else {
                await new Promise((resolve) => setTimeout(resolve, 200));
            }
            return api.request(config);
        }

        throw error;
    }
);

export { api, getCsrfCookie };
