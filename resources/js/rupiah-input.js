class RupiahInput {
    constructor(inputElement) {
        this.inputElement = inputElement;
        this.init();
    }

    init() {
        this.inputElement.addEventListener('input', this.formatCurrency.bind(this));
    }

    formatCurrency() {
        let value = this.inputElement.value;

        // Hapus semua karakter selain angka
        value = value.replace(/\D/g, '');

        // Format angka sebagai mata uang Rupiah
        const formattedValue = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(value);

        // Perbarui nilai input dengan format mata uang
        this.inputElement.value = formattedValue;
    }
}
