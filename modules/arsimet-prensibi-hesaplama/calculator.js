function hcArsimetHesapla() {
    const rho = parseFloat(document.getElementById('hc-ap-sivi').value);
    const V = parseFloat(document.getElementById('hc-ap-hacim').value);
    const g = 9.81; // Yercekimi ivmesi

    if (!V) {
        alert('Lütfen batan hacim değerini giriniz.');
        return;
    }

    // Fk = rho * V * g
    const Fk = rho * V * g;
    const kütle = rho * V; // kg

    const sonucDiv = document.getElementById('hc-archimedes-result');
    document.getElementById('hc-ap-res-f').innerText = Fk.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' Newton (N)';
    document.getElementById('hc-ap-res-m').innerText = kütle.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' kg';
    
    const noteDiv = document.getElementById('hc-ap-res-note');
    noteDiv.innerText = `Cisme etki eden kaldırma kuvveti, cismin yer değiştirdiği (taşırdığı) sıvının ağırlığına eşittir.`;

    sonucDiv.classList.add('visible');
}
