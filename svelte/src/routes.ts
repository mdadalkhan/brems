import Index        from './routes/root.svelte'
import UserHome     from './routes/users/home.svelte'
import UsersBnType  from './routes/users/UsersBnType.svelte'
import UsersEnType  from './routes/users/UsersEnType.svelte'
import UserPractice from './routes/users/UserPractice.svelte'

import Errors from './routes/404.svelte'


const routes = {
  '/': Index,
  '/users': UserHome,
  '/users/bangla-test' : UsersBnType,
  '/users/english-test': UsersEnType,
  '/users/practice'    : UserPractice,
  '*': Errors
}

export default routes
