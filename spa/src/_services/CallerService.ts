// _services/CallerService.ts
import axios from 'axios';
import router from '@/router';

const Axios = axios.create({
    baseURL: 'http://localhost:8000',
    headers: {
      Accept: 'application/json'
    },
    withCredentials: true, // axios va copier les cookies d'auth dans le header de la requête
    withXSRFToken: true,
    xsrfCookieName: 'XSRF-TOKEN',
    xsrfHeaderName: 'X-XSRF-TOKEN'
  });
export default Axios;