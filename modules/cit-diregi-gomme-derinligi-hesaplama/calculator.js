function hcCDGHesapla() {
    const h = parseFloat(document.getElementById('hc-cdg-height').value);
    const factor = parseFloat(document.getElementById('hc-cdg-soil').value);

    if (isNaN(h) || h <= 0) {
        alert('Lütfen geçerli bir yükseklik giriniz.');
        return;
    }

    // Depth = h * factor
    const depth = h * factor;
    const total = h + depth;

    document.getElementById('hc-cdg-depth').innerText = Math.ceil(depth) + ' cm';
    document.getElementById('hc-cdg-total').innerText = Math.ceil(total) + ' cm';
    
    document.getElementById('hc-cdg-result').classList.add('visible');
}
