function hcMileTestHesapla() {
    const weight = parseFloat(document.getElementById('hc-mt-weight').value);
    const age = parseInt(document.getElementById('hc-mt-age').value);
    const gender = parseInt(document.getElementById('hc-mt-gender').value);
    const min = parseInt(document.getElementById('hc-mt-min').value || 0);
    const sec = parseInt(document.getElementById('hc-mt-sec').value || 0);
    const hr = parseInt(document.getElementById('hc-mt-hr').value);

    if (!weight || !age || (!min && !sec) || !hr) {
        alert('Lütfen tüm bilgileri giriniz.');
        return;
    }

    const time = min + (sec / 60);
    const weightLbs = weight * 2.20462;

    // Rockport Fitness Walking Test Formula:
    // VO2max = 132.853 - (0.0769 × Weight_lb) - (0.3877 × Age) + (6.315 × Gender) - (3.2649 × Time_min) - (0.1565 × Heart_rate)
    const vo2max = 132.853 - (0.0769 * weightLbs) - (0.3877 * age) + (6.315 * gender) - (3.2649 * time) - (0.1565 * hr);

    const resVal = document.getElementById('hc-mt-res-val');
    resVal.innerText = vo2max.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-mile-test-result').classList.add('visible');
}
