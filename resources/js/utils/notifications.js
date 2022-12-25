import Swal from 'sweetalert2'

export const showToastNotification = async () => {
    Swal.fire({
        toast: true,
        position: 'top-right',
        iconColor: 'green',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        icon: 'success',
        title: 'Usuario creado!'
    })
}
