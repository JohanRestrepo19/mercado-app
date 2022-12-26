import Swal from 'sweetalert2'

export const showToastNotification = async (msg = '') => {
    Swal.fire({
        toast: true,
        position: 'top-right',
        iconColor: 'green',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        icon: 'success',
        title: msg
    })
}

export const showConfirmationAlert = async () => {
    const result = await Swal.fire({
        title: 'Estás seguro?',
        text: 'No podrás revertir la acción',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    })
    if (result.isConfirmed) return true
    return false
}
