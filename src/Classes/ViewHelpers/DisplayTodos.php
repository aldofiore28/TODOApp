<?php

namespace Todo\ViewHelpers;

use Todo\Entities\TodoEntity;

class DisplayTodos
{
    public static function displayTodos(array $todos) :string
    {
        $result = '';
        foreach($todos as $todo) {
            if ($todo instanceof TodoEntity)
                $result .= '<article class="todo">
                                <div class="description">
                                    <p>' . $todo->getDescription() . '</p>
                                    <p>' . $todo->getDeadline() . '</p>
                                </div>
                                <div class="finish-todo">
                                    <form method="post" action="homepage/completeTodo">
                                        <input type="hidden" name="id" value="' . $todo->getId() . '">
                                        <input type="submit" value="DONE">
                                    </form>
                                </div>
                            </article>';
        }
        return $result;
    }

    public static function displayCompletedTodos(array $todos) :string
    {
        $result = '';
        foreach($todos as $todo) {
            if ($todo instanceof TodoEntity)
                $result .= '<article class="todo">
                                <div class="description">
                                    <p>' . $todo->getDescription() . '</p>
                                    <p>' . $todo->getDeadline() . '</p>
                                </div>
                                <div class="finish-todo">
                                    <form method="post" action="homepage/reinsertTodo">
                                        <input type="hidden" name="id" value="' . $todo->getId() . '">
                                        <input type="submit" value="TRY AGAIN">
                                    </form>
                                </div>
                            </article>';
        }
        return $result;
    }
}