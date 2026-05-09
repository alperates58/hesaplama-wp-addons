function hcEHHesapla() {
    const cathode = parseFloat(document.getElementById('hc-eh-cathode').value);
    const anode = parseFloat(document.getElementById('hc-eh-anode').value);

    if (isNaN(cathode) || isNaN(anode)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // E_cell = E_cathode - E_anode
    const eCell = cathode - anode;

    document.getElementById('hc-eh-val').innerText = eCell.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' V';
    
    const desc = document.getElementById('hc-eh-desc');
    if (eCell > 0) {
        desc.innerText = "Hücre istemlidir (Galvanik/Voltaik Hücre).";
        desc.style.color = "#4CAF50";
    } else if (eCell < 0) {
        desc.innerText = "Hücre istemli değildir (Elektrolitik Hücre).";
        desc.style.color = "#F44336";
    } else {
        desc.innerText = "Sistem dengededir.";
        desc.style.color = "#FFC107";
    }

    document.getElementById('hc-eh-result').classList.add('visible');
}
