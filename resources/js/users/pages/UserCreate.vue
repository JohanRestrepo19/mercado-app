<template>
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h1>Crear Usuario</h1>
            </div>
            <div class="card-body">
                <!-- Create user form -->
                <!-- TODO: Manejar la creación de los usuarios -->
                <!-- NOTE: Manejar los campos basicos para despues incluir el rol cuando todo funcione -->
                <form class="mx-4">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input
                            type="email"
                            class="form-control"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                        />
                        <div id="emailHelp" class="form-text">
                            We'll never share your email with anyone else.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" />
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        }
    }
</script>
