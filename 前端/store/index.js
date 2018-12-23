export const state = () => ({
    用户: null
})
export const mutations = {
    设置用户(状态, 用户) {
        状态.用户 = 用户
    }
}
export const actions = {
    nuxtServerInit({ commit }, { $axios }) {
        $axios.post('user/isLogin').then(({ data }) => {
            commit('设置用户', data)
        })
    },
    登录({ commit }, { $axios, 名字, 密码 }) {
        $axios.post('user/signIn', {
            'name': 名字,
            'pwd': 密码
        }).then(({ data }) => {
            if (data.code) {
                commit('设置用户', 名字)
            } else {
                alert(data.msg)
            }
        })
    },
    注册({ commit }, { $axios, 名字, 密码 }) {
        $axios.post('user/signUp', {
            'name': 名字,
            'pwd': 密码
        }).then(({ data }) => {
            if (data.code) {
                commit('设置用户', 名字)
            } else {
                alert(data.msg)
            }
        })
    },
    注销({ commit }, { $axios }) {
        $axios.post('user/logout').then(() => {
            commit('设置用户',null)
        })
    }
}
