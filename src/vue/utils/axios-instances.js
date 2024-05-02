import axios from "axios";
import { baseApiUrl, headers } from "./vue-variables";

export const axiosInstance = axios.create({
   baseURL: baseApiUrl,
   headers: headers,
});
