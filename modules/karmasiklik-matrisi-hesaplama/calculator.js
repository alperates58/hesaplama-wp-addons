function hcConfusionMatrixHesapla() {
    const tp = parseFloat(document.getElementById('hc-cm-tp').value);
    const tn = parseFloat(document.getElementById('hc-cm-tn').value);
    const fp = parseFloat(document.getElementById('hc-cm-fp').value);
    const fn = parseFloat(document.getElementById('hc-cm-fn').value);

    if (isNaN(tp) || isNaN(tn) || isNaN(fp) || isNaN(fn)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const total = tp + tn + fp + fn;
    if (total === 0) {
        alert('Toplam gözlem sayısı 0 olamaz.');
        return;
    }

    const accuracy = (tp + tn) / total;
    const precision = (tp + fp) > 0 ? tp / (tp + fp) : 0;
    const recall = (tp + fn) > 0 ? tp / (tp + fn) : 0;
    const specificity = (tn + fp) > 0 ? tn / (tn + fp) : 0;
    const f1 = (precision + recall) > 0 ? 2 * (precision * recall) / (precision + recall) : 0;

    const fmt = (val) => '%' + (val * 100).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-res-cm-acc').innerText = fmt(accuracy);
    document.getElementById('hc-res-cm-prec').innerText = fmt(precision);
    document.getElementById('hc-res-cm-rec').innerText = fmt(recall);
    document.getElementById('hc-res-cm-spec').innerText = fmt(specificity);
    document.getElementById('hc-res-cm-f1').innerText = (f1 * 100).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }); // F1 is often 0-1, but I'll show it as index

    document.getElementById('hc-karmasiklik-matrisi-result').classList.add('visible');
}
