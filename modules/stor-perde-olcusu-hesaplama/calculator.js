function hcBlindSizeHesapla() {
    const w = parseFloat(document.getElementById('hc-blind-w').value) || 0;
    const h = parseFloat(document.getElementById('hc-blind-h').value) || 0;

    if (w < 20 || h < 20) {
        alert('Lütfen geçerli ölçüler giriniz.');
        return;
    }

    // Stor perde için yanlardan +10'ar cm taşma payı idealdir
    const kasaW = w + 20;
    const kumasW = kasaW - 4;
    const orderH = h + 15; // Rulo payı için

    document.getElementById('hc-res-blind-w-kasa').innerText = kasaW + ' cm';
    document.getElementById('hc-res-blind-w-kumas').innerText = kumasW + ' cm';
    document.getElementById('hc-res-blind-h').innerText = orderH + ' cm';
    
    document.getElementById('hc-blind-size-result').classList.add('visible');
}
