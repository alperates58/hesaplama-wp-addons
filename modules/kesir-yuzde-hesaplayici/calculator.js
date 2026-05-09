function hcKesirHesapla() {
    const num = parseFloat(document.getElementById('hc-num-val').value);
    const den = parseFloat(document.getElementById('hc-den-val').value);

    if (isNaN(num) || isNaN(den) || den === 0) {
        alert('Lütfen geçerli değerler giriniz. Payda 0 olamaz.');
        return;
    }

    const percentage = (num / den) * 100;

    document.getElementById('hc-res-kesir-val').innerText = percentage.toLocaleString('tr-TR', { 
        maximumFractionDigits: 6 
    });

    document.getElementById('hc-kesir-result').classList.add('visible');
}
