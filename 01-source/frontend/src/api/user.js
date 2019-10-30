import axios from '@/libs/api.request'

export const login = ({ name, password }) => {
  const data = {
    name,
    password
  }
  return axios.request({
    url: 'auth/login',
    data,
    method: 'post'
  })
}

export const getUserInfo = (token) => {
  return axios.request({
    url: 'auth/me',
    params: {
      token
    },
    method: 'post'
  })
}

export const logout = (token) => {
  return axios.request({
    url: 'auth/logout',
    params: {
      token
    },  
    method: 'post'
  })
}

