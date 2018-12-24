export const state = () => ({
    用户: null
})
export const mutations = {
    设置用户(状态, 用户) {
        状态.用户 = 用户
    }
}
