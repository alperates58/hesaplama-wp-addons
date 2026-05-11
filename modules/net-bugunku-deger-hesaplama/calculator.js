function hcNpvSatirEkle() {
    const container = document.getElementById('hc-npv-cashflows');
    const year = container.querySelectorAll('.hc-npv-row').length + 1;
    const newRow = document.createElement('div');
    newRow.className = 'hc-npv-row';
    newRow.innerHTML = `
        <label>${year}. Yıl Nakit Akışı (₺)</label>
        <input type="number" class="hc-npv-cf" placeholder="₺">
    `;
    container.appendChild(newRow);
}

function hcNpvHesapla() {
    const initial = parseFloat(document.getElementById('hc-npv-initial').value);
    const rate = parseFloat(document.getElementById('hc-npv-rate').value) / 100;
    const cashflows = document.querySelectorAll('.hc-npv-cf');

    if (isNaN(initial) || isNaN(rate)) {
        alert('Lütfen maliyet ve iskonto oranını girin.');
        return;
    }

    let npv = -initial;
    for (let i = 0; i < cashflows.length; i++) {
        const cf = parseFloat(cashflows[i].value) || 0;
        npv += cf / Math.pow(1 + rate, i + 1);
    }

    document.getElementById('hc-npv-res-total').innerText = npv.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    
    const commentElem = document.getElementById('hc-npv-comment');
    const totalElem = document.getElementById('hc-npv-res-total');
    
    if (npv > 0) {
        commentElem.innerText = "NPV Pozitif: Proje kârlı görünüyor ve yatırım yapılabilir.";
        totalElem.style.color = "green";
    } else if (npv < 0) {
        commentElem.innerText = "NPV Negatif: Proje maliyetini karşılamıyor, yatırım riskli.";
        totalElem.style.color = "red";
    } else {
        commentElem.innerText = "NPV Sıfır: Proje başabaş noktasında.";
        totalElem.style.color = "black";
    }

    document.getElementById('hc-npv-result').classList.add('visible');
}
