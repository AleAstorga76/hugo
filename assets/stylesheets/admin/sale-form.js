// assets/admin/sale-form.js
document.addEventListener('DOMContentLoaded', function() {
    const productSelect = document.getElementById('sale_product');
    const quantitySelect = document.getElementById('sale_quantity');
    const unitPriceInput = document.getElementById('sale_unit_price');
    
    if (!productSelect || !quantitySelect) return;
    
    // Cargar datos de productos al cambiar la selección
    productSelect.addEventListener('change', function() {
        const productId = this.value;
        updateQuantityOptions(productId);
    });
    
    // Actualizar precio al cambiar cantidad
    quantitySelect.addEventListener('change', function() {
        updateUnitPrice();
    });
    
    function updateQuantityOptions(productId) {
        // Limpiar opciones actuales
        quantitySelect.innerHTML = '<option value="">Selecciona cantidad...</option>';
        
        if (!productId) return;
        
        // Obtener el producto seleccionado
        const selectedOption = productSelect.querySelector(`option[value="${productId}"]`);
        if (!selectedOption) return;
        
        // Los datos están en data-attributes del option
        const availablePrices = JSON.parse(selectedOption.getAttribute('data-prices') || '{}');
        
        // Agregar opciones de cantidad disponibles
        Object.keys(availablePrices).forEach(quantity => {
            const price = availablePrices[quantity];
            const option = document.createElement('option');
            option.value = quantity;
            option.textContent = `${quantity} piezas - $${price}`;
            option.setAttribute('data-price', price);
            quantitySelect.appendChild(option);
        });
        
        // Seleccionar la primera opción si hay disponibles
        if (Object.keys(availablePrices).length > 0) {
            quantitySelect.value = Object.keys(availablePrices)[0];
            updateUnitPrice();
        }
    }
    
    function updateUnitPrice() {
        const selectedOption = quantitySelect.options[quantitySelect.selectedIndex];
        if (selectedOption && selectedOption.value) {
            const price = selectedOption.getAttribute('data-price');
            if (unitPriceInput && price) {
                unitPriceInput.value = price;
            }
        }
    }
    
    // Inicializar si ya hay un producto seleccionado
    if (productSelect.value) {
        updateQuantityOptions(productSelect.value);
    }
});