import axios, { AxiosPromise } from 'axios';
import { SLIDES_URL } from './../utils/constants';

export const getAllSlides = async (): Promise<AxiosPromise> => {
  try {
    const response = await axios.get(SLIDES_URL);
    return response.data;
  } catch (err) {
    return err;
  }
}

export const getSlideDetail = async (id: string): Promise<AxiosPromise> => {
  try {
    const response = await axios.get(`${SLIDES_URL}/detail/${id}`)
    return response.data;
  } catch (err) {
    return err;
  }
}
