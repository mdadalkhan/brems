import Index      from './routes/root.svelte'
import UserHome   from './routes/users/home.svelte'



const routes = {
       '/': Index,
  '/users': UserHome
}

export default routes
