function hcAkimBolucuDirenclEkle() {
    const container = document.getElementById('hc-ab-resistors');
    const index = container.children.length + 1;
    const div = document.createElement('div');
    div.className = 'hc-ab-resistor-row';
    div.innerHTML = `
        <label>Direnç ${index} (R${index})</label>
        <input type="number" class="hc-ab-r-input" placeholder="Ohm (Ω)" step="0.1">
    `;
    container.appendChild(div);
}

function hcAkimBolucuHesapla() {
    const It = parseFloat(document.getElementById('hc-ab-itoplam').value);
    const inputs = document.querySelectorAll('.hc-ab-r-input');
    
    let direncler = [];
    inputs.forEach(input => {
        const val = parseFloat(input.value);
        if (val > 0) direncler.push(val);
    });

    if (!It || direncler.length < 2) {
        alert('Lütfen toplam akımı ve en az iki direnç değerini giriniz.');
        return;
    }

    // Eşdeğer Direnç (Paralel): 1/Req = sum(1/Ri)
    let tersToplam = 0;
    direncler.forEach(r => tersToplam += (1/r));
    const Req = 1 / tersToplam;

    const listContainer = document.getElementById('hc-ab-current-list');
    listContainer.innerHTML = '';

    document.getElementById('hc-ab-res-req').innerText = Req.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' Ω';

    direncler.forEach((r, i) => {
        // Ix = It * (Req / Rx)
        const Ix = It * (Req / r);
        const item = document.createElement('div');
        item.className = 'hc-result-item';
        item.innerHTML = `
            <span>I${i+1} Akımı:</span>
            <strong>${Ix.toLocaleString('tr-TR', {maximumFractionDigits: 4})} A</strong>
        `;
        listContainer.appendChild(item);
    });

    document.getElementById('hc-akim-bolucu-result').classList.add('visible');
}
