function hcSmHesapla() {
    const input = document.getElementById('hc-sm-inch').value.trim();
    let inch = 0;

    if (input.includes('/')) {
        const parts = input.split('/');
        if (parts.length === 2) {
            inch = parseFloat(parts[0]) / parseFloat(parts[1]);
        }
    } else {
        inch = parseFloat(input);
    }

    if (isNaN(inch)) {
        alert('Lütfen geçerli bir ölçü girin (Örn: 1/2 veya 0.5).');
        return;
    }

    const mm = inch * 25.4;

    document.getElementById('hc-sm-val').innerText = mm.toFixed(2) + " mm";
    document.getElementById('hc-sm-result').classList.add('visible');
}
