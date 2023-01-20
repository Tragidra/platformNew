export function getDayOfWeek(data){
    const days_name = [
        'Понедельник',
        'Вторник',
        'Среда',
        'Четверг',
        'Пятница',
        'Суббота',
        'Воскресенье'
    ];
    let result = [];
    let days = JSON.parse(data)
    for(let i = 0; i < days.length;i++){
        result.push(days_name[days[i]])
    }
    return result.join()
}
