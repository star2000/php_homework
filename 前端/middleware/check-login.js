export default function ({ store, $axios }) {
    if (!store.state.用户) {
        $axios.post('user/isLogin').then(({ data }) => {
            store.commit('设置', data)
        })
    }
}