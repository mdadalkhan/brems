/**
 * @author <mdadalkhan@gmail.com>
 * Global state
 * */


interface UserSession {
  username: string | null
  password: string | null
}


export const users = $state<UserSession>({
  username: "Adal",
  password: "1233"
})
