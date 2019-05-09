<?php

namespace Todo\ViewHelpers;

use Todo\Entities\TodoEntity;

class DisplayTodos
{
    public static function displayTodos($todos)
    {
        $result = '';
        foreach($todos as $todo) {
            if ($todo instanceof TodoEntity)
                $result .= '<article class="todo">
                                <div class="description">
                                    <p>' . $todo->getDescription() . '</p>
                                </div>
                                <div class="finish-todo">
                                    <form method="post" action="/completeTodo">
                                        <input type="hidden" name="id" value="' . $todo->getId() . '">
                                        <input type="submit" value="DONE">
                                    </form>
                                </div>
                            </article>';
        }
        return $result;
    }

    public static function displayCompletedTodos($todos)
    {
        $result = '';
        foreach($todos as $todo) {
            if ($todo instanceof TodoEntity)
                $result .= '<article class="todo">
                                <div class="description">
                                    <p>' . $todo->getDescription() . '</p>
                                </div>
                                <div class="finish-todo">
                                    <form method="post" action="/reinsertTodo">
                                        <input type="hidden" name="id" value="' . $todo->getId() . '">
                                        <input type="submit" value="TRY AGAIN">
                                    </form>
                                </div>
                            </article>';
        }
        return $result;
    }
}