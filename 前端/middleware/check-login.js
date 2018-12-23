export default function ({ store, $axios }) {
    $axios.post('user/isLogin').then(({ data }) => {
        store.commit('设置用户', data)
    })
}