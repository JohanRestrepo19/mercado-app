export const addProductToCart = (product, userId) => {
    // 1. Obtener el carrito del usuario
    const userCart = JSON.parse(localStorage.getItem(userId)) || []
    // 2. Evaluar si el producto ya está añadido o no
    const productIndex = userCart.findIndex(item => item.id === product.id)
    // Si el index es -1 quiere decir que el producto no se encuentra en el carrito.
    const userNewCart =
        productIndex === -1
            ? [...userCart, product]
            : userCart.map(item => (item.id === product.id ? product : item))
    localStorage.setItem(userId, JSON.stringify(userNewCart, null, 2))
}

export const getUserCart = userId => {
    const userCart = JSON.parse(localStorage.getItem(userId))
    return userCart
}

export const setUserCart = (userId, cart) => {
    localStorage.setItem(userId, JSON.stringify(cart, null, 2))
}

export const cleanCart = () => {}
