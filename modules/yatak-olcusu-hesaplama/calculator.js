function hcBedSizeGuncelle() {
    const val = document.getElementById('hc-bed-type').value;
    const parts = val.split('x');
    const w = parseInt(parts[0]);
    const l = parseInt(parts[1]);

    document.getElementById('hc-res-bed-w').innerText = w + ' cm';
    document.getElementById('hc-res-bed-l').innerText = l + ' cm';

    // Oda tavsiyesi: Yatağın her yanından +60cm geçiş payı
    const minW = w + 120;
    const minL = l + 100;
    document.getElementById('hc-res-bed-advice').innerText = `Bu yatak için en az ${minW}x${minL} cm boyutunda bir oda önerilir.`;

    // Görsel ölçekleme
    const box = document.getElementById('hc-bed-box');
    box.style.width = (w / 2) + 'px';
    box.style.height = (l / 2) + 'px';
}

// Init
window.addEventListener('load', hcBedSizeGuncelle);
