function hcPerformansMatrisiHesapla() {
    const tp = parseInt(document.getElementById('hc-pm-tp').value) || 0;
    const tn = parseInt(document.getElementById('hc-pm-tn').value) || 0;
    const fp = parseInt(document.getElementById('hc-pm-fp').value) || 0;
    const fn = parseInt(document.getElementById('hc-pm-fn').value) || 0;
    const resultDiv = document.getElementById('hc-performans-matrisi-hesaplama-result');

    const total = tp + tn + fp + fn;
    if (total === 0) {
        alert('Lütfen en az bir değer giriniz.');
        return;
    }

    const accuracy = (tp + tn) / total;
    const errorRate = (fp + fn) / total;
    const precision = (tp + fp) > 0 ? tp / (tp + fp) : 0;
    const recall = (tp + fn) > 0 ? tp / (tp + fn) : 0;
    const specificity = (tn + fp) > 0 ? tn / (tn + fp) : 0;
    const f1 = (precision + recall) > 0 ? (2 * precision * recall) / (precision + recall) : 0;

    document.getElementById('hc-pm-acc').innerText = `%${(accuracy * 100).toLocaleString('tr-TR', {maximumFractionDigits: 2})}`;
    document.getElementById('hc-pm-err').innerText = `%${(errorRate * 100).toLocaleString('tr-TR', {maximumFractionDigits: 2})}`;
    document.getElementById('hc-pm-prec').innerText = `%${(precision * 100).toLocaleString('tr-TR', {maximumFractionDigits: 2})}`;
    document.getElementById('hc-pm-rec').innerText = `%${(recall * 100).toLocaleString('tr-TR', {maximumFractionDigits: 2})}`;
    document.getElementById('hc-pm-spec').innerText = `%${(specificity * 100).toLocaleString('tr-TR', {maximumFractionDigits: 2})}`;
    document.getElementById('hc-pm-f1').innerText = f1.toLocaleString('tr-TR', {maximumFractionDigits: 4});

    resultDiv.classList.add('visible');
}
