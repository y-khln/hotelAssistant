const trainingData = [

    { input: { gender: 2, first: 2, second: 1, third: 1, forth: 1, fifth: 2, sixth: 3, seventh:2, eighth: 2}, output: {film_drama: 1, film_horror: 0.1, film_action: 0.1, concert_pop: 0.1}},
    { input: { gender: 2, first: 1, second: 3, third: 1, forth: 2, fifth: 1, sixth: 3, seventh:3, eighth: 2}, output: {film_action: 1, film_fantastic: 1, concert_pop:1, concert_humor: 0.6}},
    { input: { gender: 2, first: 3, second: 3, third: 2, forth: 1, fifth: 2, sixth: 3, seventh:1, eighth: 2}, output: {concert_humor: 1, film_drama: 1, concert_pop:1, film_comedy: 0.7}},
    // { input: { gender: 2, first: 1, second: 3, third: 3, forth: 3, fifth: 2, sixth: 2, seventh:4, eighth: 2}, output: {theatre: 1, film_drama: 1}},
    { input: { gender: 2, first: 1, second: 3, third: 3, forth: 3, fifth: 2, sixth: 2, seventh:4, eighth: 2}, output: {film_drama: 1, film_detective: 0.2, concert_classic: 1, concert_rock: 0.1}},
    { input: { gender: 1, first: 1, second: 3, third: 3, forth: 3, fifth: 2, sixth: 2, seventh:4, eighth: 2}, output: {film_drama: 1, film_detective: 0.2, concert_humor: 1, concert_pop: 0.6}},
    { input: { gender: 1, first: 1, second: 1, third: 1, forth: 2, fifth: 1, sixth: 3, seventh:3, eighth: 1}, output: {film_action: 1, film_comedy: 1, concert_pop: 0.8, concert_rock:0.8}},
    { input: { gender: 1, first: 2, second: 2, third: 1, forth: 2, fifth: 1, sixth: 3, seventh:2, eighth: 1}, output: {film_action: 1, film_fantastic: 1, film_drama: 0.8, concert_pop: 0.5}},
    { input: { gender: 1, first: 1, second: 1, third: 1, forth: 2, fifth: 1, sixth: 2, seventh:2, eighth: 1}, output: {film_family: 1, film_fantastic: 1, film_drama: 0.8, film_comedy: 0.5}},
    { input: { gender: 2, first: 1, second: 1, third: 1, forth: 2, fifth: 1, sixth: 2, seventh:2, eighth: 1}, output: {film_family: 1, film_fantastic: 1, film_drama: 0.7, film_comedy: 0.4}},
    { input: { gender: 1, first: 1, second: 3, third: 3, forth: 2, fifth: 1, sixth: 3, seventh:1, eighth: 1}, output: {film_comedy: 1, concert_humor: 1, film_fantastic: 1, concert_pop: 0.6}},
    { input: { gender: 2, first: 1, second: 2, third: 2, forth: 3, fifth: 2, sixth: 2, seventh:4, eighth: 2}, output: {film_comedy: 1, concert_humor: 1,film_drama: 1, concert_pop: 0.6}},

    { input: { gender: 1, first: 3, second: 3, third: 2, forth: 3, fifth: 2, sixth: 3, seventh:4, eighth: 1}, output: {film_drama: 1, film_detective: 1, concert_classic: 1, concert_pop: 0.1}},
    { input: { gender: 1, first: 2, second: 1, third: 1, forth: 1, fifth: 1, sixth: 1, seventh:3, eighth: 1}, output: {film_comedy: 1, concert_humor: 1, concert_pop: 0.8, concert_classic: 0.2}},
    { input: { gender: 1, first: 1, second: 1, third: 1, forth: 1, fifth: 1, sixth: 1, seventh:1, eighth: 1}, output: {film_action: 1, film_comedy: 0.5, film_horror: 0.7, concert_rock: 0.5}},
    { input: { gender: 2, first: 1, second: 1, third: 1, forth: 1, fifth: 1, sixth: 1, seventh:1, eighth: 1}, output: {film_action: 1, film_comedy: 0.6, film_horror: 0.4, concert_rock: 0.4}},
    { input: { gender: 1, first: 1, second: 1, third: 2, forth: 2, fifth: 1, sixth: 3, seventh:2, eighth: 1}, output: {film_family: 1, film_drama: 0.5, film_detective: 0.1, concert_classic: 0.1}},
    { input: { gender: 1, first: 2, second: 1, third: 1, forth: 2, fifth: 1, sixth: 1, seventh:1, eighth: 1}, output: {film_fantastic: 1, film_drama: 0.5, film_horror: 0.1, concert_rock: 0.4}},
    { input: { gender: 1, first: 2, second: 1, third: 1, forth: 2, fifth: 1, sixth: 3, seventh:2, eighth: 2}, output: {film_horror: 1, film_action: 1, film_family: 0.1, concert_rock: 0.7}}

];
// Создаем нейронную сеть
const net = new brain.NeuralNetwork({
    hiddenLayers: [6,4]
});

net.train(trainingData, {
    iterations: 1500,
    learningRate: 0.3,
    errorThresh: 0.005});

export default net
