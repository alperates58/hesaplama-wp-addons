function hcAddGenRow() {
    const container = document.getElementById('hc-gen-devices');
    const div = document.createElement('div');
    div.className = 'hc-gen-row';
    div.innerHTML = `
        <input type="text" class="hc-gen-name" placeholder="Cihaz Adı">
        <input type="number" class="hc-gen-watt" placeholder="Watt">
        <button onclick="this.parentElement.remove()" style="background:none; border:none; color:red; cursor:pointer;">✕</button>
    `;
    container.appendChild(div);
}

function hcJeneratörGücüHesapla() {
    const watts = document.querySelectorAll('.hc-gen-watt');
    let totalWatt = 0;
    
    watts.forEach(w => totalWatt += parseFloat(w.value) || 0);

    if (totalWatt === 0) return;

    // kVA = Watt / (cosφ * 1000) * Safety Factor
    // cosφ genelde 0.8 alınır. Emniyet payı %20 (1.2).
    const kva = (totalWatt / (0.8 * 1000)) * 1.2;

    document.getElementById('hc-gen-val').innerText = kva.toFixed(2) + ' kVA';
    document.getElementById('hc-gen-result').classList.add('visible');
}
