function hcDeskHeightHesapla() {
    const h = parseFloat(document.getElementById('hc-user-h').value) || 0;

    if (h < 100) return;

    // Ergonomik formüller
    const deskH = (h * 0.41);
    const chairH = (h * 0.25);

    document.getElementById('hc-res-desk-h').innerText = Math.round(deskH) + ' cm';
    document.getElementById('hc-res-chair-h').innerText = Math.round(chairH) + ' cm';
    
    document.getElementById('hc-desk-height-result').classList.add('visible');
}
