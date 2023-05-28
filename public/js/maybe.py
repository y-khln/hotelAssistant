import tensorflow as tf
from tensorflow.keras.preprocessing.text import Tokenizer
from tensorflow.keras.preprocessing.sequence import pad_sequences

# Задаем данные для обучения и тестирования
texts = ["Это хорошая книга", "Я не люблю этот фильм", "Это вкусный рецепт"]
labels = [1, 0, 1]

# Инициализируем токенизатор и обучаем его на текстах
tokenizer = Tokenizer(num_words=10000, oov_token="<OOV>")
tokenizer.fit_on_texts(texts)

# Преобразуем тексты в числовые последовательности и добавляем нули для выравнивания длин
sequences = tokenizer.texts_to_sequences(texts)
padded_sequences = pad_sequences(sequences, maxlen=50, padding="post", truncating="post")

# Задаем архитектуру нейронной сети
model = tf.keras.Sequential([
    tf.keras.layers.Embedding(input_dim=10000, output_dim=16, input_length=50),
    tf.keras.layers.Flatten(),
    tf.keras.layers.Dense(1, activation="sigmoid")
])

# Компилируем модель
model.compile(optimizer="adam", loss="binary_crossentropy", metrics=["accuracy"])

# Обучаем модель
model.fit(padded_sequences, labels, 10, 0.2)

# Классифицируем новый текст
new_text = ["Это отличный продукт"]
new_sequence = tokenizer.texts_to_sequences(new_text)
new_padded_sequence = pad_sequences(new_sequence, maxlen=50, padding="post", truncating="post")
prediction = model.predict(new_padded_sequence)

print(prediction)