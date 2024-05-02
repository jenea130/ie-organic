import { axiosInstance } from "../utils/axios-instances";
export async function fetchApi(url: string) {
  const data = await axiosInstance.post(url, {
    error_alert: "fetchApi error",
  });
  const result = data.data.data;
  return { data: result };
}
